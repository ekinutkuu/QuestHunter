window.addEventListener('DOMContentLoaded', function () {

    const textArea = document.querySelector('textarea');


    textArea.addEventListener('keydown', function(e){
        if (e.key === 'Tab'){
            e.preventDefault();
            
            //selecting the text
            const start = this.selectionStart;
            const end = this.selectionEnd;
            const selectedText = this.value.substring(start, end);
            
            const lines = selectedText.split('\n');
            const indentedLines = lines.map(line => '     ' + line);
            const indentedText = indentedLines.join('\n');

            this.value = this.value.substring(0, start) + indentedText + this.value.substring(end);
        
            this.selectionStart = start + 5;
            this.selectionEnd = start + 5;

        }
    });

});
