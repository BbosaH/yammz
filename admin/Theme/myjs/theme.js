
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#logo')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
}

function makecities()
{
    country_id = document.getElementById("country").value;
    $.get("http://localhost:80//yammzit/admin/Theme/classes/util.php?country_id="+country_id,function(data){
        document.getElementById('city').innerHTML=data;
    });
    
}
function makeSubcategories(id,populated_id)
{
    category_id = document.getElementById(id).value;
    $.get("http://localhost:80//yammzit/admin/Theme/classes/util.php?category_id="+category_id,function(data){
        document.getElementById(populated_id).innerHTML=data;
    });
}



