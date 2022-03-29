// window.onload = () => {
//     document.getElementById("listProductBtn").addEventListener("click", function() {
//         location.replace("listproduct.php");
//     })
// }

const query = () => {
    let queryvalue = document.getElementById("searchbar_input").value;
    // if (queryvalue === "") {
    //     location.replace("products.php");
    //     return;
    // }
    alert(queryvalue);
    // let querypath = "products.php?query=" + queryvalue;
    // location.replace(querypath);
}

function handle(e){
        if(e.keyCode === 13){
            e.preventDefault(); // Ensure it is only this code that runs

            // alert("Enter was pressed was presses");
            let queryvalue = document.getElementById("searchbar_input").value;
            if (queryvalue === "") {
                location.replace("products.php");
                return;
            }
            alert(queryvalue);
            let querypath = "products.php?query=" + queryvalue;
            location.replace(querypath);
        }
    }
