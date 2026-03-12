import dayjs from 'dayjs'

const calendarDays = document.querySelector('.calendar-days')
const header = document.querySelector('.month')
const nextMonth = document.getElementById('nextMonth')
const prevMonth = document.getElementById('prevMonth')

const checkinDisplay = document.getElementById('checkinDisplay')
const checkoutDisplay = document.getElementById('checkoutDisplay')

const checkinInput = document.getElementById('checkinDate')
const checkoutInput = document.getElementById('checkoutDate')

const dateError = document.getElementById('dateError')

let monthNow = dayjs().month()

// reservation ranges from backend
let occupiedRanges = window.serverOccupiedRanges || []

// selected range
let rangeStart = null
let rangeEnd = null

const iso = (d) => d.format('YYYY-MM-DD')

// Monday-first index
const mondayIndex = (d) => (d.day() + 6) % 7

// ---------- ERROR ----------
function showError(msg) {
  if (!dateError) return
  dateError.textContent = msg
  dateError.style.display = 'block'
}

function clearError() {
  if (!dateError) return
  dateError.textContent = ''
  dateError.style.display = 'none'
}

// ---------- RANGE CHECK ----------
function isInRange(dateStr) {
  if (!rangeStart || !rangeEnd) return false
  return dateStr >= rangeStart && dateStr <= rangeEnd
}

// ---------- RESERVATION TYPE ----------
function getReservationType(dateStr) {

  for (let r of occupiedRanges) {

    if (dateStr === r.start) return "start"

    if (dateStr === r.end) return "end"

    if (dateStr > r.start && dateStr < r.end) return "middle"
  }

  return null
}

// ---------- CHECK RANGE OVERLAP ----------
function rangeHasOccupied(startIso, endIso) {

  for (let r of occupiedRanges) {

    if (
      startIso < r.end &&
      endIso > r.start
    ) {
      return true
    }

  }

  return false
}

// ---------- DATE DISPLAY ----------
function updateDateDisplay() {

  if (rangeStart) {
    checkinDisplay.textContent = dayjs(rangeStart).format('MMM DD, YYYY')
    checkinInput.value = rangeStart
  } else {
    checkinDisplay.textContent = '-'
    checkinInput.value = ''
  }

  if (rangeEnd) {
    checkoutDisplay.textContent = dayjs(rangeEnd).format('MMM DD, YYYY')
    checkoutInput.value = rangeEnd
  } else {
    checkoutDisplay.textContent = '-'
    checkoutInput.value = ''
  }

  console.log('CHECKIN:', rangeStart)
  console.log('CHECKOUT:', rangeEnd)
}

// ---------- CALENDAR RENDER ----------
function calendarRender() {

  const view = dayjs().month(monthNow).startOf('month')
  header.textContent = view.format('MMMM YYYY')

  const gridStart = view.subtract(mondayIndex(view), 'day')

  const todayStr = dayjs().format('YYYY-MM-DD')

  let html = ''

  for (let i = 0; i < 42; i++) {

    const cellDate = gridStart.add(i, 'day')
    const dateStr = iso(cellDate)

    const otherMonth = cellDate.month() !== view.month()

    let cls = 'day'

    if (otherMonth) cls += ' other-month'

    if (dateStr < todayStr) cls += ' past-date'

    const reservationType = getReservationType(dateStr)

    if (reservationType === "middle") cls += ' occupied'
    if (reservationType === "start") cls += ' occupied-start'
    if (reservationType === "end") cls += ' occupied-end'

    if (dateStr === rangeStart) cls += ' range-start'
    if (dateStr === rangeEnd) cls += ' range-end'
    if (isInRange(dateStr)) cls += ' in-range'

    html += `<div class="${cls}" data-date="${dateStr}">${cellDate.date()}</div>`

  }

  calendarDays.innerHTML = html
}

// ---------- CLICK ----------
calendarDays.addEventListener('click', (e) => {

  const cell = e.target.closest('.day')

  if (!cell) return

  if (
    cell.classList.contains('other-month') ||
    cell.classList.contains('occupied') ||
    cell.classList.contains('past-date')
  ) return

  clearError()

  const clicked = cell.dataset.date

  // first click
  if (!rangeStart || (rangeStart && rangeEnd)) {

    rangeStart = clicked
    rangeEnd = null

    calendarRender()
    updateDateDisplay()

    return
  }

  // second click
  if (clicked < rangeStart) {

    rangeEnd = rangeStart
    rangeStart = clicked

  } else {

    rangeEnd = clicked

  }

  // check overlap
  if (rangeHasOccupied(rangeStart, rangeEnd)) {

    showError('Selected range overlaps an existing reservation.')

    rangeStart = null
    rangeEnd = null

    calendarRender()
    updateDateDisplay()

    return
  }

  calendarRender()
  updateDateDisplay()

})

// ---------- NAVIGATION ----------
nextMonth.addEventListener('click', () => {

  monthNow++
  calendarRender()

})

prevMonth.addEventListener('click', () => {

  monthNow--
  calendarRender()

})

// ---------- INIT ----------
calendarRender()
updateDateDisplay()