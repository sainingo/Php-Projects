let id =  $("input[name*='book_id']");
id.attr("readonly","readonly");

$(".btnedit").click(e=>{
    console.log("icon clicked");
    let textvalue = displayData(e);
    console.log(textvalue);
    //laitet
  
   let bookname =  $("input[name*='book_name']");
   let bookpublisher =  $("input[name*='book_publisher']");
   let bookprice =  $("input[name*='book_price']");

   id.val(textvalue[0]);
   bookname.val(textvalue[1]);
   bookpublisher.val(textvalue[2]);
   bookprice.val(textvalue[3].replace("$",""));

})

function displayData(e){
    let id = 0;
    const td = $("#tbody tr td");
    let textvalue = [];

    for (const value of td){
        console.log(value);
        if(value.dataset.id == e.target.dataset.id){
            console.log(e.target.dataset.id);
            console.log(value);

            // laiter
            textvalue[id++] = value.textContent;

        }
    }
    return textvalue;
}