var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ 'font': [] }, { 'size': [] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],['clean']  
        ]
    }
});

// Save content to textarea before form submission
document.querySelector("form").onsubmit = function() {
    document.querySelector("#productDescription").value = quill.root.innerHTML;
};