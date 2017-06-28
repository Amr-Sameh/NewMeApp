$(function(){
    new WOW().init();

});



$(function () {

    $('[placeholder]').focus(function () {
        $(this).attr('data-text',$(this).attr('placeholder'));
        $(this).attr('placeholder','');
    }).blur(function () {
        $(this).attr('placeholder',$(this).attr('data-text'));
    });


});



/**
 * Created by PC - MeiR on 6/18/2017.
 */
$(document).ready(function () {


    /*
    new page part
     */
if($('#comment-section').length!=0){
    var news_id =document.getElementsByClassName('news-page')[0].id;
    getnews_detail(news_id);
    setInterval(function () {
       getnews_detail(news_id);
    }, 5000);


}


    $(document).on('click', '#like', function () {
    var news_id =document.getElementsByClassName('news-page')[0].id;
        like(news_id);
    getnews_detail(news_id);
});


    $(document).on('click', '#dislike', function () {
        var news_id =document.getElementsByClassName('news-page')[0].id;
        dislike(news_id);
        getnews_detail(news_id);
    });

    $(document).on('click', '.edit-comment', function () {
        document.getElementById('edit-fild').value=this.getAttribute('name');
        var x =document.getElementsByClassName('submit-comment-change')[0];
       x.setAttribute('id',this.id.substr(4,this.id.length));
    });

    $(document).on('click', '.delete-comment', function () {
        deletecomment(this.id.substr(6,this.id.length));
        var news_id =document.getElementsByClassName('news-page')[0].id;
        getnews_detail(news_id);
    });


    $(document).on('click', '.submit-comment-change', function () {
        var content=document.getElementById('edit-fild').value;
        editcomment(this.id,content);
        var news_id =document.getElementsByClassName('news-page')[0].id;
        getnews_detail(news_id);
    });



    $(document).on('click', '.add-new-comment', function () {
        var content=document.getElementById('new-comment-content').value;
        var news_id =document.getElementsByClassName('news-page')[0].id;
        addcomment(content,news_id);
        document.getElementById('new-comment-content').value="";
        getnews_detail(news_id);
    });








/*********************************************************/


/*
Messages Part
 */


    if($('.messages-section').length!=0) {
        var id = document.getElementsByClassName('messages-section')[0].id;
        getmessages(id);
        setInterval(function () {
            getmessages(id);
        }, 1000);


    }


    $(document).on('click', '.send-msg', function () {
        var id = document.getElementsByClassName('messages-section')[0].id;
        var content = document.getElementById('new-msg-content').value;
       if (content!=null || content!=""){
           sendmessages(id,content);
       }
        document.getElementById('new-msg-content').value="";
        if (content!=null || content!="") {

            getmessages(id);
        }

    });








});




function getnews_detail(id) {

    $.ajax({
        url: "../classes/ajax_action.php",
        method:"POST",
        data:{action:'GetNewsDetail',id:id},
        success:function (data) {
           var array= data.split("^&*");
            $('#likes').html(array[0]);
            $('#comments').html(array[1]);
            $('#comment-section').html(array[2]);
        }

    });

}



function like(id) {

    $.ajax({
        url: "../classes/ajax_action.php",
        method:"POST",
        data:{action:'Like',id:id},
        success:function (data) {
        }

    });

}




function dislike(id) {

    $.ajax({
        url: "../classes/ajax_action.php",
        method:"POST",
        data:{action:'Dislike',id:id},
        success:function (data) {
        }

    });

}

function deletecomment(id) {

    $.ajax({
        url: "../classes/ajax_action.php",
        method:"POST",
        data:{action:'DeleteComment',comment_id:id},
        success:function (data) {
        }

    });

}


function editcomment(id,content) {

    $.ajax({
        url: "../classes/ajax_action.php",
        method:"POST",
        data:{action:'EditComment',comment_id:id,content:content},
        success:function (data) {

        }

    });

}


function addcomment(content,news_id) {

    $.ajax({
        url: "../classes/ajax_action.php",
        method:"POST",
        data:{action:'AddComment',content:content,news_id:news_id},
        success:function (data) {
        }

    });

}


function getmessages(id) {
    $.ajax({
        url: "../classes/ajax_action.php",
        method:"POST",
        data:{action:'GetMessages',to:id},
        success:function (data) {
           $('#message-container').html(data);
        }

    });

}


function sendmessages(id,content) {
    $.ajax({
        url: "../classes/ajax_action.php",
        method:"POST",
        data:{action:'SendMessages',to:id,content:content},
        success:function (data) {
        }

    });

}















