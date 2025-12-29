document.addEventListener("DOMContentLoaded", function () {
   
    const headers = document.querySelectorAll(".toggle-header");

    
    headers.forEach(header => {
        header.addEventListener("click", function () {
          
            const content = this.nextElementSibling;
            const icon = this.querySelector(".toggle-icon");

            
            if (content && content.classList.contains("toggle-content")) {
                const isOpen = content.style.display === "block";
                
                
                content.style.display = isOpen ? "none" : "block";

               
                icon.classList.toggle("fa-plus", isOpen);
                icon.classList.toggle("fa-minus", !isOpen);
            }
        });

        
        const content = header.nextElementSibling;
        if (content && content.classList.contains("toggle-content")) {
            content.style.display = "none";
        }
    });
});