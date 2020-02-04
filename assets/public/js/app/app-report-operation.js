$(function($){
    $('#tableOperation1').dataTable();

    $('#tableOperation2').dataTable();
})

function createFormattingWorkbook() {

    var workbook = new $.ig.excel.Workbook($.ig.excel.WorkbookFormat.excel2007);
    var sheet = workbook.worksheets().add('Sheet1');
    sheet.columns(0).setWidth(96, $.ig.excel.WorksheetColumnWidthUnit.pixel);
    sheet.columns(4).setWidth(80, $.ig.excel.WorksheetColumnWidthUnit.pixel);
    sheet.columns(6).setWidth(96, $.ig.excel.WorksheetColumnWidthUnit.pixel);

    // Add merged regions for regions A1:D2 and E1:G2
    var mergedCellA1D2 = sheet.mergedCellsRegions().add(0, 0, 1, 3);
    var mergedCellE1G2 = sheet.mergedCellsRegions().add(0, 4, 1, 6);

    // Add two large headers in merged cells above the data
    // mergedCellA1D2.value('Acme, Inc.');
    // mergedCellA1D2.cellFormat().alignment($.ig.excel.HorizontalCellAlignment.center);
    // mergedCellA1D2.cellFormat().fill($.ig.excel.CellFill.createSolidFill('#ED7D31'));
    // mergedCellA1D2.cellFormat().font().colorInfo(new $.ig.excel.WorkbookColorInfo($.ig.excel.WorkbookThemeColorType.light1));
    // mergedCellA1D2.cellFormat().font().height(16 * 20);

    // mergedCellE1G2.value('Invoice #32039');
    // mergedCellE1G2.cellFormat().alignment($.ig.excel.HorizontalCellAlignment.center);
    // mergedCellE1G2.cellFormat().fill($.ig.excel.CellFill.createSolidFill('#FFC000'));
    // mergedCellE1G2.cellFormat().font().colorInfo(new $.ig.excel.WorkbookColorInfo($.ig.excel.WorkbookThemeColorType.light1));
    // mergedCellE1G2.cellFormat().font().height(16 * 20);

    // Format some rows and columns that should have similar formatting so we don't have to set it on individual cells.
    sheet.rows(2).cellFormat().font().bold(true);
    sheet.columns(4).cellFormat().formatString('$#,##0.00_);[Red]($#,##0.00)');
    sheet.columns(6).cellFormat().formatString('$#,##0.00_);[Red]($#,##0.00)');

    // Add a light color fill to all cells in the A3:G17 region to visually separate it from the rest of the sheet. We can iterate
    // all cells in the regions by getting an enumerator for the region and enumerating each item.
    var light1Fill = $.ig.excel.CellFill.createSolidFill(new $.ig.excel.WorkbookColorInfo($.ig.excel.WorkbookThemeColorType.light1));
    var cells = sheet.getRegion('A3:G17').getEnumerator();
    while (cells.moveNext()) {
        cells.current().cellFormat().fill(light1Fill);
    }

    // Populate the sheet with data
    sheet.getCell('A3').value('No');
    sheet.getCell('B3').value('Date');
    sheet.getCell('D3').value('COF');
    sheet.getCell('E3').value('ART');
    sheet.getCell('F3').value('AHT');
    sheet.getCell('G3').value('AST');
    sheet.getCell('H3').value('SCR');


  

    // Add a grand total which is bold and larger than the rest of the text to call attention to it.

    // Save the workbook
    saveWorkbook(workbook, "Formatting.xlsx");
}

function saveWorkbook(workbook, name) {
    workbook.save({ type: 'blob' }, function (data) {
        saveAs(data, name);
    }, function (error) {
        alert('Error exporting: : ' + error);
    });
}


$(function () {
    var keys = ["EmployeeID", "FirstName", "LastName", "RegistererDate", "Country", "Age", "IsActive", "Company"],
        columnsToSkip = [];

    $("div.optionContainer:lt(4)").igCheckboxEditor();
    $("select").igCombo({ width: "150px", mode: "dropdown"});
    $("#colstoskip").igCombo({
        width: "150px",
        mode: "dropdown",
        dataSource: keys,
        multiSelection: {
            enabled: true,
            showCheckboxes: true
        }
    });
    $("fieldset").show();
    $("#grid1").igGrid({
        autoGenerateColumns: false,
        width: "100%",
        primaryKey: "EmployeeID",
        autofitLastColumn: true,
        columns: [
            { headerText: "Employee ID", key: "EmployeeID", dataType: "string", hidden: true },
            { headerText: "Last Name", key: "LastName", width: "15%", dataType: "string" },
            { headerText: "Country", key: "Country", width: "15%", dataType: "string" },
            { headerText: "Age", key: "Age", width: "15%", dataType: "number" },
            { headerText: "Is Active", key: "IsActive", width: "15%", dataType: "bool", format: "checkbox" },
            { headerText: "Company", key: "Company", width: "20%", dataType: "string", unbound: true, formula: function () { return "http://infragistics.com/"; } },
            { headerText: "Register Date", key: "RegistererDate", width: "20%", dataType: "date" }
        ],
        dataSource: employees,
        primaryKey: "EmployeeID",
        features: [
            {
                name: "Filtering"
            },
            {
                name: "Sorting",
                mode: "multi",
            },
            {
                name: "Paging",
                type: "local",
                pageSize: 30
            },
            {
                name: "Hiding",
            },
            {
                name: "Summaries",
            }
        ]
    });

    $("#btn-export").igButton({ labelText: "Export" });
    $("#btn-export").on("click", function () {
        var exportingOverlay = $('<div>');
        if ($("#colstoskip").igCombo("selectedItems") != null) {
            $.each($("#colstoskip").igCombo("selectedItems"), function (index, item) {
                columnsToSkip.push(item.data.value);
            });
        }

        $.ig.GridExcelExporter.exportGrid($("#grid1"), {
            fileName: "igGrid",
            gridStyling: $("#styling").igCheckboxEditor("value") ? "applied" : "none",
            columnsToSkip: columnsToSkip,
            gridFeatureOptions: {
                filtering: $("#filtering").igCombo("value"),
                paging: $("#paging").igCombo("value"),
                hiding: $("#hiding").igCombo("value"),
                columnFixing: $("#colfixing").igCheckboxEditor("value") ? "applied" : "none",
                sorting: $("#sorting").igCheckboxEditor("value") ? "applied" : "none",
                summaries: $("#summaries").igCheckboxEditor("value") ? "applied" : "none"
            },
        },
        {
            exportStarting: function (e, args) {
                showOverlay(args.grid, exportingOverlay);
            },
            success: function () {
                hideOverlay(exportingOverlay);
            },
            cellExported: function (e, args) {
                if (args.xlRow.index() == 0) {
                    return;
                }
                if (args.columnKey == 'Company') {
                    var xlRow = args.xlRow;
                    xlRow.cells(args.columnIndex).applyFormula('=HYPERLINK("' + args.cellValue + '")');
                }
                if (args.columnKey == "Age" && args.cellValue > 43) {
                    args.xlRow.getCellFormat(args.columnIndex).font().bold(1);
                    args.xlRow.getCellFormat(args.columnIndex).fill($.ig.excel.CellFill.createLinearGradientFill(45, '#FF0000', '#00FFFF'));
                }
            },
            exportEnding: function (e, args) {
                var columns = args.worksheet.columns();
                columns.item(columns.count() - 1).cellFormat().formatString("dd/MMM/YYYY");
            },
        });
    });
});

function showOverlay(grid, exportingOverlay) {
    var $gridContainer = $('#' + grid.attr('id') + '_container');

    exportingOverlay.css({
        "width": $gridContainer.outerWidth(),
        "height": $gridContainer.outerHeight()
    }).html('<span class="exporting-text">Exporting...</span>');
    exportingOverlay.addClass("exporting-overlay");

    $gridContainer.append(exportingOverlay);
}

function hideOverlay(exportingOverlay) {
    exportingOverlay.remove();
}
// usage
// (function ($) {
// $('#btn-export').click(function(){
//     createFormattingWorkbook();
// })

// })(jQuery);