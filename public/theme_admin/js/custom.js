$(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    // ajax active hiên/ ẩn 
    $(".btn_active").click(function(e){
        e.preventDefault();
        let $this=$(this);
        let url=$this.attr("href");

        $.ajax({
                url: url,
                type:'POST',
                data: {},
                context:this,
                })    
                .done(function(result) {
                 if(result.active=='1')
                 {
                    $(this).html('public');
                    $(this).removeClass('badge-secondary').addClass('badge-danger');
                 }
                 else
                 {
                  $(this).html('private');
                  $(this).removeClass('badge-danger').addClass('badge-secondary');
                 }
                  });
    });

     // ajax xóa 1 hàng trong admin 
     $(".xoa").click(function(e){
        e.preventDefault();
        if(!confirm('bạn chắc chắn muốn xóa dữ liệu ?'))
        {
            return false;
        }
        let $this=$(this);
        let url=$this.attr("href");
      
        $.ajax({
                url: url,
                type:'POST',
                data: {},
                context:this,
                })    
                .done(function(result) {
         
                   $('tr.row_'+result.id).fadeOut();
                 
                  });
    });

    // ajax xóa nhiều hàng 
    $(".list_action").find("#submit").click(function(){
        if(!confirm("Bạn có chắc chắn xóa hết dữ liệu"))
        {
          return false;
        }

        let ids=new Array();
        $('[name="id[]"]:checked').each(function(){
            ids.push($(this).val());
        });

        if(!ids.length) return false;

        let url= $(this).attr("url");
        console.log(url);
        $.ajax({
          url: url,
          type:'POST',
          data: {'ids':ids},
          context:this,
          })    
          .done(function(result) {
            $(ids).each(function(id, val){
              $('tr.row_'+val).fadeOut();      
            });
          });
        });

        // ajax active nhiều hàng
        $(".list_action").find("#active").click(function(){

          let ids=new Array();
          $('[name="id[]"]:checked').each(function(){
              ids.push($(this).val());
          });
  
          if(!ids.length) return false;
  
          let url= $(this).attr("url");
          console.log(url);
          $.ajax({
            url: url,
            type:'POST',
            data: {'ids':ids},
            context:this,
            })    
            .done(function(result) {
              $(result).each(function(id, val){
                if(val.active=='1')
                {
                   $('.btn_active_'+val.id).html('public');
                   $('.btn_active_'+val.id).removeClass('badge-secondary').addClass('badge-danger');
                }
                else
                {
                 $('.btn_active_'+val.id).html('private');
                 $('.btn_active_'+val.id).removeClass('badge-danger').addClass('badge-secondary');
                }
              });
            });
          });

          // set số thứ tự 
          $(".num").change(function(e){
            e.preventDefault();
            let url=$(this).attr("url");
   
            $.ajax({
              type: "POST",
              url: url,
              data: {'num':$(this).val()},
              success: function () {
                
              }
            });
          })
     // ajax thể loại danh mục
          $("#pid").change(function(e){
            e.preventDefault();
            let $this=$(this);
            let pid=$this.val();
            let url=$this.attr("url");
    
            $.ajax({
                    url: url,
                    type:'POST',
                    data: {
                            pid:pid
                        },
                    })    
                    .done(function(result) {
                       if(result.error=='a')
                        alert(result.mess);
                    });
        });

  

});
   

    // check all checkbox
    function checkAllJquery(baseId, itemClass) {
        var baseCheck = $('#' + baseId).is(":checked");
        $('.' + itemClass).each(function() {
          if (!$(this).is(':disabled')) {
            $(this).prop('checked', baseCheck);
          }
        });
      }

      function convert_vi_to_en(str) 
      {  
      str= str.toLowerCase();  
      str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
      str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
      str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
      str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
      str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
      str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
      str= str.replace(/đ/g,"d");  
      str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-"); 
      /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */ 
      str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1- 
      str= str.replace(/^\-+|\-+$/g,"");  
      //cắt bỏ ký tự - ở đầu và cuối chuỗi  
      return str;  
  }


  $(document).ready(function() {

    //xóa ảnh
    $('body').on('click', '.closes', function() {
      let url=$(this).attr("url");
      if(url=='#')
      {
        $(".img-wraps").html('<img   id="out_img"  style="margin-bottom:5px" width="100px" class="img img-responsive"> ');  
        $("#input_img").val('');
        return false;
      }

      $.ajax({
              url: url,
              type:'POST',
              data: {},
              })    
              .done(function(result) {
                $(".img-wraps").html('<img   id="out_img"  style="margin-bottom:5px" width="100px" class="img img-responsive"> ');  
                $("#input_img").val('');
              });

     
    });


 // load anh trực tiếp
      function readURL(input) {
        if(input.files && input.files[0]){
          var reader=new FileReader();
          reader.onload=function(e){
            $('#out_img').attr('src',e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      $('body').on('change', '#input_img', function() {
        // let url='{{route('+'admin.ajax.action.category'+',['+'delImg'+','+$category->id+'])}}';
        $(".img-wraps").append('<span url="#" class="closes" title="Delete">&times;</span>');
        readURL(this); 
        });

  // show tùy các tùy chọn theo thể loại danh mục
  $("#type").change(function(e){
    e.preventDefault();
    num=$(this).val();
    if(num=='12'){
      $('.tab-3').show();
      $('.tab-1').hide();
    }
    else{
      $('.tab-1').show();
      $('.tab-3').hide();
    }
  })   

  num= $("#type").val();
    if(num=='12'){
      $('.tab-3').show();
      $('.tab-1').hide();
    }
    else{
      $('.tab-1').show();
      $('.tab-3').hide();
    }
    var key_title = 60;
    var key_short = 325;
    //nut tao seo
    $(".tao-seo").click(function(){
      $("#seo_title").val($("#name").val());
      $("#seo_description").val($("#description").val());
      $("#slug").val(convert_vi_to_en($("#name").val()));
      $('#key_title').val(key_title-$('#seo_title').val().length);
      $('#key_short').val(key_short-$("#seo_description").val().length);
    });
   
    $('#seo_title').keyup(function() {
      $('#key_title').val(key_title-$(this).val().length);
    });
     $('#seo_description').keyup(function() {
      $('#key_short').val(key_short-$(this).val().length);
    });

    $('#key_title').val(key_title-$('#seo_title').val().length);
    $('#key_short').val(key_short-$("#seo_description").val().length);

  });