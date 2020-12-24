const date = new Date();
// console.log(date);
const rendenCalender = () => {
    
    date.setDate(1);
    
    const monthDays = document.querySelector('.days');
    
    const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    //  new Date(date.getFullYear(), date.getMonth());  This month first day
    //  new Date(date.getFullYear(), date.getMonth(), 1);  This month first day
    //  new Date(date.getFullYear(), date.getMonth(), 0);  Prev-month last day
    //  new Date(date.getFullYear(), date.getMonth() + 1, 0);  This month last day
    // console.log(lastDay)
    
    const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();
    // console.log(prevLastDay)
    const firstDayIndex = date.getDay(); //prev-month avaliable last day
    
    const lastDayIndex = new Date(date.getFullYear(), date.getMonth(), 0).getDay();
    const nextDays = 7 - lastDayIndex - 1;
    
    // const month = date.getMonth();
    // console.log(month);
    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];
    a = new Date().getDate();
    //console.log(("0" + (this.a)).slice(-2));
    document.querySelector(".now-style h1").innerHTML = (("0" + (this.a)).slice(-2));
    document.querySelector(".now-style h2").innerHTML = months[date.getMonth()];
    document.querySelector(".date h1").innerHTML = months[date.getMonth()];
    document.querySelector(".now-style p").innerHTML = new Date().toDateString();
    
    let days = "";
    
    for(let x = firstDayIndex; x > 0; x--){
        days += `<div class="prev-date">${prevLastDay - x + 1}</div>`; // * + 1 *
    }
    
    for(let i = 1; i <= lastDay; i++){
        if(i === new Date().getDate() && date.getMonth() === new Date().getMonth()){
            days += `<div class="today">${i}</div>`;
        }else{
            days += `<div>${i}</div>`;
        }
    }
    
    for(let y = 1; y <= nextDays; y++){
        days += `<div class="next-date">${y}</div>`;
        monthDays.innerHTML = days;
    }
}

document.querySelector('.prev').addEventListener("click",function(){
    date.setMonth(date.getMonth() - 1);
    rendenCalender();
});
document.querySelector('.next').addEventListener("click",function(){
    date.setMonth(date.getMonth() + 1);
    rendenCalender();
});
rendenCalender();