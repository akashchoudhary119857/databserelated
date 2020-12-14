
let id=$("input[name*='book_id']");
id.attr("readonly","readonly");


$(".btnedit").click(e=>{
   //console.log("icon clicked");
    //getData();
    let textvalues=displayData(e);
    //let id=$("input[name*='book_id']");
    let book_name=$("input[name*='book_name']");
    let book_publisher=$("input[name*='book_publisher']");
    let book_price=$("input[name*='book_price']");
    id.val(textvalues[0]);
    book_name.val(textvalues[1]);
    book_publisher.val(textvalues[2]);
    book_price.val(textvalues[3].replace("₹",""));
});
function displayData(e){
    let id=0;
    const td=$("#tbody tr td");
    let textvalues=[];
    for(const value of td){
       //console.log(value);
        if(value.dataset.id==e.target.dataset.id){
            //console.log(value);
            textvalues[id++]=value.textContent;
        }
    }
    return textvalues;
}