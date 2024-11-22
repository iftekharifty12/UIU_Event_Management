document.getElementById('seemore-btn').addEventListener('click',function(){
    document.getElementById('nomore').style.display='block';
    document.getElementById('see-btn2').style.display='block'
    document.getElementById('see-btn1').style.display='none';
})

document.getElementById('seeless-btn').addEventListener('click',function(){
    document.getElementById('nomore').style.display='none';
    document.getElementById('see-btn1').style.display='block';
    document.getElementById('see-btn2').style.display='none';
    
})


let card_see_btn=document.getElementById('card-see-btnmore')
card_see_btn.addEventListener('click',function(){
    card_see_btn.setAttribute("id","card-see-btnless")
    console.log("buton clk")
})

document.getElementById('seeless-btn').addEventListener('click',function(){
    document.getElementById('nomore').style.display='none';
    document.getElementById('see-btn1').style.display='block';
    document.getElementById('see-btn2').style.display='none';
    
})



console.log("this file working")