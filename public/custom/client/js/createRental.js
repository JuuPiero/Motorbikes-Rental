console.log('hêr');

const pickUpTimeElement = document.querySelector('input[name="start_time"')
const dropOffTimeElement = document.querySelector('input[name="end_time"')
const totalPriceElement = document.querySelector('.total-price')
// pickUpTimeElement.value = Date.now()

function countPrice() {

}

pickUpTimeElement.addEventListener("change", () => {
    let date1 = new Date(pickUpTimeElement.value);
    let date2 = new Date(dropOffTimeElement.value);
    let Difference_In_Time = date2.getTime() - date1.getTime();
    let Difference_In_Days = Math.round(Difference_In_Time / (1000 * 3600 * 24));
    if(Difference_In_Days > 0) {
        console.log(Difference_In_Days)
        totalPriceElement.value = Difference_In_Days * pricePerDay
    }
})

dropOffTimeElement.addEventListener("change", () => {
    let date1 = new Date(pickUpTimeElement.value);
    let date2 = new Date(dropOffTimeElement.value);
    let Difference_In_Time = date2.getTime() - date1.getTime();
    let Difference_In_Days = Math.round(Difference_In_Time / (1000 * 3600 * 24));
    if(Difference_In_Days > 0) {
        console.log(Difference_In_Days)
        totalPriceElement.value = Difference_In_Days * pricePerDay


    }
})