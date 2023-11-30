var nut = document.querySelectorAll(".fa-solid");

for (let i = 0; i < nut.length; i++) 
{   nut[i].onclick=function() 
    {
        if(this.classList[1]==="selected")
        {
            this.classList.remove("selected");
        }
        else
        {
            for (let i = 0; i < nut.length; i++) {
                nut[i].classList.remove("selected");
            }
            //adđ màu xanh cho icon được click
            this.classList.toggle("selected");
        }
    } 
}
