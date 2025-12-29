const stars = document.querySelectorAll(".star");
const ratingInput = document.getElementById("rating");

stars.forEach((star, index) => {
    star.addEventListener("click", () => {
        
        if (star.classList.contains("active")) {
            for (let i = index; i < stars.length; i++) {

                const s = stars[i];


                s.classList.remove("active");


                s.classList.replace("fa-solid", "fa-regular");





            }



            ratingInput.value = ""; 


        } 
        
        
        
        else {
           
            for (let i = 0; i <= index; i++) {

                const s = stars[i];


                s.classList.add("active");


                s.classList.replace("fa-regular", "fa-solid");




            }


            ratingInput.value = index + 1;


        }





    }


);



}



);


document.getElementById("feedbackForm").addEventListener("submit", function(event) {
    if (!ratingInput.value) {
        
        alert("Please give your rating MASJT.");
        
        event.preventDefault(); 



    }


}



); 