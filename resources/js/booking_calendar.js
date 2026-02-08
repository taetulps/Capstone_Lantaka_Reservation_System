import dayjs from 'dayjs'
console.log(dayjs().month())
console.log(dayjs())
console.log(dayjs().daysInMonth())

const nextMonth = document.querySelector('#nextMonth')

var monthNow = dayjs().month()

nextMonth.addEventListener('click',()=>{

  var showMonth = dayjs().month(monthNow+1)
  console.log(showMonth)
})

const monthHeader = document.querySelector('.month')
monthHeader.innerText=dayjs().format('MMMM YYYY')



const calendar = document.querySelector('.calendar')
const calendarDays = document.querySelector('.calendar-days')
const day = document.querySelector('.day')

calendarDays.addEventListener('click',(e)=>{
  const select = e.target.closest('day');
  if(!select) return;

  select.classList.toggle('selected')
})

const dayBox = 35;
for(var i = 0; i < dayBox; i++){
  calendarDays.innerHTML+= '<div class="day"></div>'
}