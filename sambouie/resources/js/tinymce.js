tinymce.init({
  selector: '#content',
  plugins:
    'searchreplace fullscreen link anchor charmap autoresize autosave wordcount a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste advtable tableofcontents tinycomments tinymcespellchecker',
  toolbar:
    'cut copy paste undo redo removeformat hr link unlink anchor image charmap media search replace fullscreen bold italic underline strikethrough alignleft aligncenter alignright alignjustify formatselect bullist numlist outdent indent blockqoute a11ycheck addcomment showcomments casechange checklist code export formatpainter editimage pageembed permanentpen tableofcontents',
  toolbar_mode: 'floating',
  content_css: 'writer',
  tinycomments_mode: 'embedded',
  tinycomments_author: "Alante' Adams"
});
