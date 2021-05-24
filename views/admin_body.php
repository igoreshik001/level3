
<body>
  <div class="container-fluid my-4">
    <div class = "d-inline-block"><h2>ADMIN PAGE</h2></div><div class="d-inline-block float-right mx-3"><span class="mx-4"><a href="/admin/adduser" target="_self">adduser</a></span><span><a href="/admin?logout=logout" target="_self">logout</a></span></div>
  </div>
  <div class="container-fluid border bg-light">
    <form action="/admin" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col mx-4 bg-light">
          <div class="row row-cols-5 marging">
            <div class="col-4 border border-dark text-white bg-secondary">Название</div>
            <div class="col border border-dark text-white bg-secondary">Авторы</div>
            <div class="col-1 border border-dark text-white bg-secondary">Год</div>
            <div class="col border border-dark text-white bg-secondary">Действия</div>
            <div class="col-1 border border-dark text-white bg-secondary">Кликов</div>

            {books}

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
                <label for="usr">Название книги: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div>
            </div>
            <div class="col-6 mt-2 border border-dark bg-light">
              <div class="form-group">
                <label for="usr">Автор 1: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="author0" name="author0" required>
              </div>
            </div>
            <div class="col-6 border border-dark bg-light">
              <div class="form-group">
                <label for="usr">Год издания: <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="year" name="year" required>
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
          <label for="usr">Страниц: <span class="text-danger">*</span></label>
          <input type="number" class="form-control" id="pages" name="pages" required>
        </div>
      </div>
      <div class="col-6 border border-dark bg-light" id="image_preview" name="preview_image">превью<br><span id="output"></span></div>
      <div class="col-6 border border-dark bg-light">
        <div class="form-group">
          <label for="comment">Описание книги: <span class="text-danger">*</span></label>
          <textarea class="form-control" rows="5" id="description" name="description" required></textarea>
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
