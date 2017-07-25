/**
 * Created by meir on 19/04/17.
 */







function form_submit() {

    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var type = $('#type').val();
    var gender = $('#gender').val();
    var fd=new FormData();

    //start validate

    var v_phone = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
    var v_num = new RegExp(/^\d+(?:\.\d{1,2})?$/);







    //end validate


        $('#myForm').ajaxForm({

            url: "insert.php",
            method: "GET",
            data: {
                name: name, email: email, phone: phone,   gender: gender},


            beforeSubmit: function () {



                if (!v_phone.test(phone)) {
                    $('#failed').html("برجاء ادخال رقم هاتف صحيح ");
                    return false;


                }


                $('#failed').html("");

            },

           success: function (data) {
                alert(data);

            }
        });

}






function validate() {
    var name = $('#name').val();
    var username = $('#user-name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var gender = $('#gender').val();
    var image = $('#image').val();

    var v_phone = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
    var v_num = new RegExp(/^\d+(?:\.\d{1,2})?$/);
    var v_name= new RegExp(/^.{3,15}$/);
    var v_email= new RegExp(/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/);
    if(!v_name.test(name)){

        $('#failed').html("برجاء ادخال اسم ");
        return false;
    }

   else if(!v_name.test(name)){

        $('#failed').html("برجاء ادخال اسم مستخدم ");
        return false;
    }









   else  if (!v_phone.test(phone)) {

        $('#failed').html("برجاء ادخال رقم هاتف صحيح ");
        return false;


    }

    else if(gender=='no'){
        $('#failed').html("برجاء اختيار النوع ");
        return false;
    }

    else {
        return true;
    }
}