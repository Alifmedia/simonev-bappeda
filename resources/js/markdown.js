if ($('#editor').length) {
  var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'header': [1, 2, false] }],
    ['link'],
    ['clean']                                         // remove formatting button
  ];

  var quill = new Quill('#editor', {
    modules: {
      toolbar: toolbarOptions
    },
    scrollingContainer: '#editor-container',
    placeholder: 'Deskripsi',
    theme: 'bubble'
   });


   quill.on('editor-change', function(eventName, ...args) {
     var value = $('#editor .ql-editor').html();
     if (value != '<p><br></p>') {
       $('#markdown-result').val(value);
     }
   });
}
