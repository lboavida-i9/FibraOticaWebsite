function handleFile(e) {
    //Get the files from Upload control
    var files = e.target.files;
    var i, f;
    //Loop through files
    for (i = 0, f = files[i]; i != files.length; ++i) {
        var reader = new FileReader();
        var name = f.name;
        reader.onload = function (e) {
            var data = e.target.result;

            var result;
            var workbook = XLSX.read(data, { type: 'binary' });

            var sheet_name_list = workbook.SheetNames;
            sheet_name_list.forEach(function (y) { /* iterate through sheets */
                //Convert the cell value to Json
                var roa = XLSX.utils.sheet_to_json(workbook.Sheets[y]);
                if (roa.length > 0) {
                    result = roa;
                }
            });
            //Get the first column first cell value
            $.post('../Handlers/ExcellReaderHandler.php?action=ReadExcell', { 'result': result }, function (response) {
                alert(response);
            });
        };
        reader.readAsArrayBuffer(f);
    }
}

function OnLoad() {
    $(document).ready(function () {
        $('#files').change(handleFile);
    });
}