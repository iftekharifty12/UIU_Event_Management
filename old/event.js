document.getElementById('see-btn7').addEventListener('click', function () {
    document.getElementById('nomore4').style.display = 'block';
    document.getElementById('see-btn8').style.display = 'block'
    document.getElementById('see-btn7').style.display = 'none';
})

document.getElementById('see-btn8').addEventListener('click', function () {
    document.getElementById('nomore4').style.display = 'none';
    document.getElementById('see-btn7').style.display = 'block';
    document.getElementById('see-btn8').style.display = 'none';

})

// document.getElementById('see-btn9').addEventListener('click',function(){
//     document.getElementById('nomore5').style.display='block';
//     document.getElementById('see-btn10').style.display='block'
//     document.getElementById('see-btn9').style.display='none';
// })

// document.getElementById('see-btn10').addEventListener('click',function(){
//     document.getElementById('nomore5').style.display='none';
//     document.getElementById('see-btn9').style.display='block';
//     document.getElementById('see-btn10').style.display='none';

// })



import { card } from './data.js'
console.log("club card", card)

let len = 0;
let club_event = document.getElementById('club-event');
card.forEach((el) => {
    len++;

    if (len < 4) {
        let newItem = document.createElement('div');
        newItem.classList.add("card", "card-w")
        newItem.innerHTML = `
    <img src="${el.url}" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">${el.para}</p>
      <p>${el.club}</p>
    
    </div>
 
    `
        club_event.appendChild(newItem)
    } else {
        console.log("filling")
    }
})



document.getElementById('see-btn9').addEventListener('click', function () {
    // document.getElementById('nomore').style.display = 'block';
    // document.getElementById('see-btn2').style.display = 'block'
    // document.getElementById('see-btn1').style.display = 'none';
    club_event.innerHTML = ""

    card.forEach((el) => {



        let newItem = document.createElement('div');
        newItem.classList.add("card", "card-w")
        newItem.innerHTML = `
        <img src="${el.url}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">${el.para}</p>
        
          <p>${el.club}</p>
        </div>
     
        `
        club_event.appendChild(newItem)


    })
    document.getElementById('see-btn10').style.display = 'block'
    document.getElementById('see-btn9').style.display = 'none';
})

document.getElementById('see-btn10').addEventListener('click', function () {

    club_event.innerHTML = "";
    len = 0;

    card.forEach((el) => {
        len++;


        if (len < 4) {
            let newItem = document.createElement('div');
            newItem.classList.add("card", "card-w")
            newItem.innerHTML = `
    <img src="${el.url}" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">${el.para}</p>
      <p>${el.club}</p>
     
    </div>
 
    `
            club_event.appendChild(newItem)
        } else {
            console.log("filling")
        }
    })


    document.getElementById('see-btn9').style.display = 'block';
    document.getElementById('see-btn10').style.display = 'none';

})






let search_b9 = document.getElementById('club-search')
search_b9.addEventListener('click', () => {
    let s3_value = document.getElementById('s3').value;
    console.log(s3_value)



    if (s3_value == 'computerclub') {
        club_event.innerHTML = ""
        for (let i = 0; i < 4; i++) {
            let newItem = document.createElement('div');
            newItem.classList.add("card", "card-w")
            newItem.innerHTML = `
                <img src="${card[i].url}" class="card-img-top" alt="...">
                <div class="card-body">
                <p class="card-text">${card[i].para}</p>
                <p>${card[i].club}</p>
    </div>
 
    `
            club_event.appendChild(newItem)
        }
    }
    if (s3_value == 'appforum') {
        club_event.innerHTML = ""
        for (let i = 4; i < 8; i++) {
            let newItem = document.createElement('div');
            newItem.classList.add("card", "card-w")
            newItem.innerHTML = `
                <img src="${card[i].url}" class="card-img-top" alt="...">
                <div class="card-body">
                <p class="card-text">${card[i].para}</p>
                <p>${card[i].club}</p>
    </div>
 
    `
            club_event.appendChild(newItem)
        }

    }
    if (s3_value == 'accountingforum') {
        club_event.innerHTML = ""
        for (let i = 8; i < 12; i++) {
            let newItem = document.createElement('div');
            newItem.classList.add("card", "card-w")
            newItem.innerHTML = `
                <img src="${card[i].url}" class="card-img-top" alt="...">
                <div class="card-body">
                <p class="card-text">${card[i].para}</p>
                <p>${card[i].club}</p>
    </div>
 
    `
            club_event.appendChild(newItem)
        }

    }

})




