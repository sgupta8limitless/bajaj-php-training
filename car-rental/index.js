function changeImage(image,number,color,cdid)
{
    // console.log(source);
    document.getElementById('big-img').src=image;
    document.getElementById('number').innerText=number;

    let url=document.getElementById("booking_url").href;
    let newUrl=url.replace(url.split("?")[1],`cdid=${cdid}`);
    document.getElementById("booking_url").href=newUrl;


}


function calculatePrice(price,discount)
{
    
    let start_date=document.getElementById("start_date").value;
    let end_date=document.getElementById("end_date").value;

    if(start_date!=="")
    {
        let days = Math.floor((Date.parse(end_date) - Date.parse(start_date)) / 86400000);

        if(days>=0)
        {
            if(days===0)
            {
                days=1;
            }

            let finalamount=price*days;
            let discountAmount=(discount/100)*finalamount;
            finalamount=finalamount-discountAmount;

            document.getElementById("final-amount").innerText=finalamount;

            console.log(finalamount);

        }
        else 
        {
            alert("end date should be greater than start date");
        }

       



    }
    else 
    {
        alert("Please select a  start date");
    }
   
}


