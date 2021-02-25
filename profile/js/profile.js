
 $(document).ready(function(){
     $(".upload-icon").click(function(){
         var input = document.createElement("INPUT");
         input.type = "file";
         //input.name = "data";
         input.accept = "image/*";
         input.click();
         input.onchange = function(){
             var file = new FormData();
             file.append("data",this.files[0]);
             $.ajax({
                 type : "POST",
                 url :"php/upload.php",
                 data : file,
                 contentType : false,
                 processData : false,
                 cache : false, 
                 xhr : function(){
                        var request = new XMLHttpRequest();
                        request.upload.onprogress = function(e){
                            //console.log(e);
                            var loaded = (e.loaded/1024/1024).toFixed(2);
                            var total = (e.loaded/1024/1024).toFixed(2);
                            var percentage = (loaded*100)/total;
                            $(".progress-control").css({
                                width : percentage+"%",
                            });
                            $(".progress-percentage").html(percentage+"%"+"  "+loaded+"MB / "+total+"MB");
                        }
                        return request;
                 },
                 beforeSend : function () {
                     $(".upload-header").html("please wait...");
                     $(".upload-icon").css({
                         opacity : "0.5",
                         pointerEvents : "none",
                     });
                     $(".upload-progress-con").removeClass("d-none");
                     $(".progress-details").removeClass("d-none");
                 },
                 success : function(response){
                        alert(response);
                        $.ajax({
                            type : "POST",
                            url :"php/count_photo.php",
                            beforeSend :function () {
                                $(".count-photo").html("processing...");
                            },
                            success : function(response)
                            {
                                $(".count-photo").html(response);
                            }
                        });

                        $.ajax({
                            type : "POST",
                            url :"php/memory.php",
                            beforeSend :function () {
                                $(".memory-status").html("updating......");
                                $(".free-space").html("updating......");
                            },
                            success : function(response)
                            {
                                //$(".memory-status").html(response);
                                var json_response = JSON.parse(response);
                                var memory_status = json_response[0];
                                var free_memory = json_response[1];
                                var per_width = json_response[2]+"%";
                                
                                $(".memory-status").html(memory_status);
                                $(".free-space").html("FREE SPACE: " + free_memory);
                                $(".memory-progress").css({
                                    width : per_width
                                });
                            }
                        });
                 }
             });
         }

     });
 });