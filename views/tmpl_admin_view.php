<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid my-4">
    <div class = "d-inline-block"><h2>ADMIN PAGE</h2></div><div class="d-inline-block float-right mx-3"><span class="mx-4"><a href="/level3/admin/adduser" target="_self">adduser</a></span><span><a href="/level3/admin/logout" target="_self">logout</a></span></div>
  </div>
  <div class="container-fluid border bg-light">
    <form action="/level3/admin/add" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col mx-4 bg-light">
          <div class="row row-cols-5 marging">
            <div class="col-4 border border-dark text-white bg-secondary">Название</div>
            <div class="col border border-dark text-white bg-secondary">Авторы</div>
            <div class="col-1 border border-dark text-white bg-secondary">Год</div>
            <div class="col border border-dark text-white bg-secondary">Действия</div>
            <div class="col-1 border border-dark text-white bg-secondary">Кликов</div>

            <div id="title_0" class="col-4 border border-dark bg-light">{title0}</div>
            <div id="author_0" class="col border border-dark bg-light">{author0}</div>
            <div id="year_0" class="col-1 border border-dark bg-light">{year0}</div>
            <div id="action_0" class="col border border-dark bg-light">{id_0}</div>
            <div id="clicks_0" class="col-1 border border-dark bg-light">{clicks0}</div>

            <div id="title_1" class="col-4 border border-dark bg-light">{title1}</div>
            <div id="author_1" class="col border border-dark bg-light">{author1}</div>
            <div id="year_1" class="col-1 border border-dark bg-light">{year1}</div>
            <div id="action_1" class="col border border-dark bg-light">{id_1}</div>
            <div id="clicks_1" class="col-1 border border-dark bg-light">{clicks1}</div>

            <div id="title_2" class="col-4 border border-dark bg-light">{title2}</div>
            <div id="author_2" class="col border border-dark bg-light">{author2}</div>
            <div id="year_2" class="col-1 border border-dark bg-light">{year2}</div>
            <div id="action_2" class="col border border-dark bg-light">{id_2}</div>
            <div id="clicks_2" class="col-1 border border-dark bg-light">{clicks2}</div>

            <div id="title_3" class="col-4 border border-dark bg-light">{title3}</div>
            <div id="author_3" class="col border border-dark bg-light">{author3}</div>
            <div id="year_3" class="col-1 border border-dark bg-light">{year3}</div>
            <div id="action_3" class="col border border-dark bg-light">{id_3}</div>
            <div id="clicks_3" class="col-1 border border-dark bg-light">{clicks3}</div>

            <div id="title_4" class="col-4 border border-dark bg-light">{title4}</div>
            <div id="author_4" class="col border border-dark bg-light">{author4}</div>
            <div id="year_4" class="col-1 border border-dark bg-light">{year4}</div>
            <div id="action_4" class="col border border-dark bg-light">{id_4}</div>
            <div id="clicks_4" class="col-1 border border-dark bg-light">{clicks4}</div>

            <div id="title_5" class="col-4 border border-dark bg-light">{title5}</div>
            <div id="author_5" class="col border border-dark bg-light">{author5}</div>
            <div id="year_5" class="col-1 border border-dark bg-light">{year5}</div>
            <div id="action_5" class="col border border-dark bg-light">{id_5}</div>
            <div id="clicks_5" class="col-1 border border-dark bg-light">{clicks5}</div>

            <div id="title_6" class="col-4 border border-dark bg-light">{title6}</div>
            <div id="author_6" class="col border border-dark bg-light">{author6}</div>
            <div id="year_6" class="col-1 border border-dark bg-light">{year6}</div>
            <div id="action_6" class="col border border-dark bg-light">{id_6}</div>
            <div id="clicks_6" class="col-1 border border-dark bg-light">{clicks6}</div>

            <div id="title_7" class="col-4 border border-dark bg-light">{title7}</div>
            <div id="author_7" class="col border border-dark bg-light">{author7}</div>
            <div id="year_7" class="col-1 border border-dark bg-light">{year7}</div>
            <div id="action_7" class="col border border-dark bg-light">{id_7}</div>
            <div id="clicks_7" class="col-1 border border-dark bg-light">{clicks7}</div>

            <div id="title_8" class="col-4 border border-dark bg-light">{title8}</div>
            <div id="author_8" class="col border border-dark bg-light">{author8}</div>
            <div id="year_8" class="col-1 border border-dark bg-light">{year8}</div>
            <div id="action_8" class="col border border-dark bg-light">{id_8}</div>
            <div id="clicks_8" class="col-1 border border-dark bg-light">{clicks8}</div>

            <div id="title_9" class="col-4 border border-dark bg-light">{title9}</div>
            <div id="author_9" class="col border border-dark bg-light">{author9}</div>
            <div id="year_9" class="col-1 border border-dark bg-light">{year9}</div>
            <div id="action_9" class="col border border-dark bg-light">{id_9}</div>
            <div id="clicks_9" class="col-1 border border-dark bg-light">{clicks9}</div>

            <div class="container my-5">
              <ul class="pagination justify-content-center">
                {pagination}
              </ul>
            </div>

          </div>
        </div>


        <div class="col mx-4 border border-dark text-white bg-secondary text-center">
          Добавить книгу.
          <div class="row text-dark">
            <div class="col-6 mt-2 border border-dark bg-light">
              <div class="form-group">
                <label for="usr">Название книги: </label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
            </div>
            <div class="col-6 mt-2 border border-dark bg-light">
              <div class="form-group">
                <label for="usr">Автор 1: </label>
                <input type="text" class="form-control" id="author0" name="author0">
              </div>
            </div>
            <div class="col-6 border border-dark bg-light">
              <div class="form-group">
                <label for="usr">Год издания: </label>
                <input type="text" class="form-control" id="year" name="year">
              </div>
            </div>
            <div class="col-6 border border-dark bg-light">
              <div class="form-group">
                <label for="usr">Автор 2: </label>
                <input type="text" class="form-control" id="author1" name="author1">
              </div>
            </div>
            <div class="col-6 border border-dark bg-light text-left">

              <p>Загрузить картинку:</p>
              <div class="custom-file mb-3">
                <input type="file" class="custom-file-input float-left" id="image_path" name="filename">
                <label class="custom-file-label" for="customFile">Загрузить картинку:</label>
              </div>

              <script>
                // Add the following code if you want the name of the file appear on select
                $(".custom-file-input").on("change", function() {
                  var fileName = $(this).val().split("\\").pop();
                  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
              </script>
              <script>
                function handleFileSelect(evt) {
                    var file = evt.target.files; // FileList object
                    var f = file[0];
                    // Only process image files.
                    if (!f.type.match('image.*')) {
                        alert("Image only please....");
                    }
                    var reader = new FileReader();
                    // Closure to capture the file information.
                    reader.onload = (function(theFile) {
                        return function(e) {
                            // Render thumbnail.
                            var span = document.createElement('span');
                            span.innerHTML = ['<img class="thumb" title="', escape(theFile.name), '" width="50%" hight="auto" src="', e.target.result, '" />'].join('');
                            document.getElementById('output').insertBefore(span, null);
                        };
                    })(f);
                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                }
                document.getElementById('image_path').addEventListener('change', handleFileSelect, false);
                </script>
        
      </div>
      <div class="col-6 border border-dark bg-light">
        <div class="form-group">
          <label for="usr">Автор 3: </label>
          <input type="text" class="form-control" id="author2" name="author2">
        </div>
        <div class="form-group">
          <label for="usr">Страниц: </label>
          <input type="text" class="form-control" id="pages" name="pages">
        </div>
      </div>
      <div class="col-6 border border-dark bg-light" id="image_preview" name="preview_image">превью<br><span id="output"></span></div>
      <div class="col-6 border border-dark bg-light">
        <div class="form-group">
          <label for="comment">Описание книги:</label>
          <textarea class="form-control" rows="5" id="description" name="description"></textarea>
        </div>
      </div>
      <div class="col-6 border border-dark bg-light">
        <div class="my-3">
          <button type="submit" class="btn btn-primary float-center">Добавить</button>
        </div>
      </div>
      <div class="col-6 border border-dark bg-light">
        *Оставьте поля пустыми если авторов больше трех.
      </div>
    </div>
  </div>
</div>
</form>
</div>

</body>
</html>
