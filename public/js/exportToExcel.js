import XLSX from 'xlsx';

function exportTableToExcel(tableId, filename = 'exported_data.xlsx') {
    const table = document.getElementById(tableId);
    const ws = XLSX.utils.table_to_sheet(table);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
    XLSX.writeFile(wb, filename);
}

export { exportTableToExcel };
