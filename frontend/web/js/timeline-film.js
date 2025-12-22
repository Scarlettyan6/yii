(function () {
  const events = window.TIMELINE_EVENTS || [];

  const axis = document.getElementById('yearAxis');
  const gallery = document.getElementById('gallery');
  const detail = document.getElementById('detail');

  if (!axis || !gallery) return;

  // 所有年份（去重+排序）
  const years = Array.from(new Set(events.map(e => e.year).filter(Boolean)))
    .sort((a, b) => a - b);

  // 你原来这套标签逻辑（卡片保持不变）
  function importanceTags(imp) {
    if (imp >= 3) return ['重要节点'];
    if (imp === 2) return ['关键事件'];
    return ['事件'];
  }

  // 弹窗里把数字翻译成人话（只影响弹窗）
  function importanceLabel(imp) {
    if (imp >= 3) return '关键转折';
    if (imp === 2) return '重要节点';
    return '历史片段';
  }

  // 把 detail 文本按换行分段显示
  function setDetailText(el, text) {
  if (!el) return;
  const t = (text ?? '').toString().trim();
  el.textContent = t || '（暂无详情）';
}


  // ===== 顶部年份轴 =====
  years.forEach((y, i) => {
    const chip = document.createElement('div');
    chip.className = 'year-chip' + (i === 0 ? ' active' : '');
    chip.textContent = y;
    chip.dataset.year = y;
    chip.addEventListener('click', () => scrollToYear(y));
    axis.appendChild(chip);
  });

  // ===== 渲染每一张卡片（保持你原来的结构不变）=====
  for (const ev of events) {
    const card = document.createElement('article');
    card.className = 'card';
    if (ev.year) card.setAttribute('data-year', ev.year);

    const tags = importanceTags(ev.importance);

    const posterHtml = ev.poster
      ? `<div class="poster">
           <img src="${ev.poster}" alt="${ev.title}" loading="lazy"/>
           <span class="badge imp-${ev.importance}">${ev.year || ''}</span>
         </div>`
      : `<div class="poster placeholder">
           <span>暂无封面（可在 DB 填 cover_image_url）</span>
           <span class="badge imp-${ev.importance}">${ev.year || ''}</span>
         </div>`;

    card.innerHTML = `
      ${posterHtml}
      <div class="meta">
        <h3>${ev.title || ''}</h3>
        <div class="date">${ev.date || ''}</div>
        <p>${ev.summary || '（暂无简介）'}</p>
        <div class="tags">${tags.map(t => `<span class='tag'>#${t}</span>`).join('')}</div>
        <button class="more" aria-label="查看详情" data-id="${ev.id}">详情</button>
      </div>`;

    gallery.appendChild(card);
  }

  // 根据 id 找事件
  const byId = id => events.find(e => String(e.id) === String(id));

  // ===== 详情弹窗：这里才是“你要变”的地方 =====
  gallery.addEventListener('click', (e) => {
    const btn = e.target.closest('button.more');
    if (!btn) return;

    const ev = byId(btn.dataset.id);
    if (!ev || !detail) return;

    const imgEl = document.getElementById('dlImg');
    if (imgEl) {
      if (ev.poster) imgEl.src = ev.poster;
      else imgEl.removeAttribute('src');
    }

    const setText = (id, val) => {
      const el = document.getElementById(id);
      if (el) el.textContent = val ?? '';
    };

    setText('dlDate', ev.date);
    setText('dlTitle', ev.title);

    // ✅ 弹窗里的“概述”区域：显示扩写后的 detail（没有 detail 就退回 summary）
    const longText = (ev.detail && String(ev.detail).trim()) ? ev.detail : ev.summary;
    setDetailText(document.getElementById('dlDesc'), longText);


    // ✅ 弹窗里的重要性：不要裸数字，换成观影式词语
    setText('dlImp', importanceLabel(ev.importance ?? 1));
    setText('dlDate2', ev.date);

    // 标签：弹窗里也更像“提示标签”
    const tagsEl = document.getElementById('dlTags');
    if (tagsEl) {
      const tags = [
        (ev.year ? `${ev.year}年` : null),
        importanceLabel(ev.importance ?? 1),
      ].filter(Boolean);
      tagsEl.innerHTML = tags.map(t => `<span class='tag'>#${t}</span>`).join('');
    }

    if (detail.showModal) detail.showModal();
  });

  // ===== 键盘左右切换 =====
  window.addEventListener('keydown', (e) => {
    if (!gallery) return;
    if (e.key === 'ArrowRight') {
      gallery.scrollBy({ left: window.innerWidth * 0.7, behavior: 'smooth' });
    }
    if (e.key === 'ArrowLeft') {
      gallery.scrollBy({ left: -window.innerWidth * 0.7, behavior: 'smooth' });
    }
  });

  // ===== 滚动时高亮当前年份 =====
  let ticking = false;
  gallery.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        highlightYearInView();
        ticking = false;
      });
      ticking = true;
    }
  });

  function highlightYearInView() {
    const cards = [...document.querySelectorAll('.card')];
    if (cards.length === 0) return;

    const mid = gallery.getBoundingClientRect().left + gallery.clientWidth / 2;
    let closest = null, min = 1e9;

    for (const c of cards) {
      const rect = c.getBoundingClientRect();
      const center = rect.left + rect.width / 2;
      const d = Math.abs(center - mid);
      if (d < min) {
        min = d;
        closest = c;
      }
    }
    if (!closest) return;

    const y = closest.getAttribute('data-year');
    [...document.querySelectorAll('.year-chip')].forEach(ch => {
      ch.classList.toggle('active', ch.dataset.year === y);
    });
  }

  function scrollToYear(y) {
    const card = document.querySelector(`.card[data-year="${y}"]`);
    if (card) {
      card.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
    }
  }

  // 初始高亮一次
  highlightYearInView();
})();
