document.addEventListener('DOMContentLoaded', () => {
  const masterWrap = document.querySelector('.food-toggle-section .toggle-buttons')
  const masterBtns = document.querySelectorAll('.food-toggle-section .toggle-btn')
  const mealSections = document.querySelectorAll('.meal-section')

  // ---------- helpers ----------
  const setActiveBtn = (btn, wrap) => {
    wrap.querySelectorAll('.toggle-btn').forEach(b => b.classList.remove('active'))
    btn.classList.add('active')
  }

  const isMasterYes = () => {
    const active = document.querySelector('.food-toggle-section .toggle-btn.active')
    return active && active.textContent.trim().toLowerCase() === 'yes'
  }

  function setMealEnabled(meal, enabled) {
    meal.dataset.enabled = enabled ? '1' : '0'

    const pill = meal.querySelector('.toggle-status')
    if (pill) {
      pill.textContent = enabled ? 'Yes' : 'No'
      pill.classList.toggle('active', !enabled)
    }

    meal.querySelectorAll('.food-item').forEach(item => {
      item.classList.toggle('unavailable', !enabled)
      if (!enabled) item.classList.remove('selected') // clear selections when disabled
    })
  }

  function setAllMeals(enabled) {
    mealSections.forEach(meal => setMealEnabled(meal, enabled))
  }

  // ---------- DEFAULT STATE ----------
  // 1) Include Food = YES by default
  if (masterWrap && masterBtns.length) {
    const yesBtn = [...masterBtns].find(b => b.textContent.trim().toLowerCase() === 'yes')
    if (yesBtn) setActiveBtn(yesBtn, masterWrap)
  }

  // 2) All meals enabled by default
  setAllMeals(true)

  // 3) All items selectable BUT NOT selected by default
  document.querySelectorAll('.food-item').forEach(item => {
    item.classList.remove('selected')
    // make sure available at default (unless you want to keep some unavailable from backend)
    item.classList.remove('unavailable')
  })

  // ---------- MULTI-SELECT (per row) ----------
  document.querySelectorAll('.food-items').forEach(row => {
    row.addEventListener('click', (e) => {
      const item = e.target.closest('.food-item')
      if (!item) return
      if (item.classList.contains('unavailable')) return

      item.classList.toggle('selected')
    })
  })

  // ---------- PER-MEAL TOGGLE (only affects that row) ----------
  mealSections.forEach(meal => {
    const pill = meal.querySelector('.toggle-status')
    if (!pill) return

    pill.addEventListener('click', () => {
      // if Include Food is NO, don't allow enabling rows
      if (!isMasterYes()) return

      const enabled = meal.dataset.enabled === '1'
      setMealEnabled(meal, !enabled)
    })
  })

  // ---------- MASTER "Include Food" toggle ----------
  masterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      if (!masterWrap) return

      setActiveBtn(btn, masterWrap)
      const yes = btn.textContent.trim().toLowerCase() === 'yes'

      if (!yes) {
        // NO => disable everything + clear selections
        setAllMeals(false)
      } else {
        // YES => enable everything (still NOT selected)
        setAllMeals(true)
      }
    })
  })
})


document.addEventListener('DOMContentLoaded', () => {
  const openBtn = document.querySelector('.date-select-btn')

  const overlay = document.getElementById('foodDateOverlay')
  const closeBtn = document.getElementById('foodDateClose')
  const confirmBtn = document.getElementById('foodDateConfirm')

  const dateList = document.getElementById('foodDateList')
  const errorEl = document.getElementById('foodDateError')

  const hiddenInput = document.getElementById('foodServiceDate')

  let selectedDate = '' // ISO YYYY-MM-DD

  const openModal = () => {
    if (!overlay) return
    overlay.classList.add('show')
    overlay.setAttribute('aria-hidden', 'false')

    // reset UI state (optional)
    errorEl && (errorEl.style.display = 'none')
  }

  const closeModal = () => {
    if (!overlay) return
    overlay.classList.remove('show')
    overlay.setAttribute('aria-hidden', 'true')
  }

  openBtn?.addEventListener('click', openModal)
  closeBtn?.addEventListener('click', closeModal)

  // close when clicking outside
  overlay?.addEventListener('click', (e) => {
    if (e.target === overlay) closeModal()
  })

  // ESC close
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && overlay?.classList.contains('show')) closeModal()
  })

  // pick a date box
  dateList?.addEventListener('click', (e) => {
    const chip = e.target.closest('.fooddate-chip')
    if (!chip) return

    // UI selection
    dateList.querySelectorAll('.fooddate-chip').forEach(c => c.classList.remove('selected'))
    chip.classList.add('selected')

    selectedDate = chip.dataset.date || ''
    if (errorEl) errorEl.style.display = 'none'

    console.log('Picked food date:', selectedDate)
  })

  // confirm selection
  confirmBtn?.addEventListener('click', () => {
    if (!selectedDate) {
      if (errorEl) {
        errorEl.textContent = 'Please select a date.'
        errorEl.style.display = 'block'
      }
      return
    }

    if (hiddenInput) hiddenInput.value = selectedDate

    // Optional: change button text so user sees selection
    if (openBtn) openBtn.textContent = `Food Date: ${selectedDate}`

    console.log('CONFIRMED food date:', selectedDate)
    closeModal()
  })
})
