document.addEventListener('DOMContentLoaded', function () {
    const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

    const comparer = (idx, asc) => (a, b) => ((v1, v2) =>
        v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
    )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

    const table = document.querySelector('#employee-table');
    const headers = table.querySelectorAll('th');
    const rowsSelect = document.querySelector('#rows-select');
    const searchInput = document.querySelector('#search-input');
    const tbody = table.querySelector('tbody');
    const allRows = Array.from(tbody.querySelectorAll('tr'));

    // Sorting functionality
    headers.forEach((th, index) => {
        let asc = true;  // Keep track of sorting order for each header
        th.addEventListener('click', function () {
            Array.from(tbody.querySelectorAll('tr'))
                .sort(comparer(index, asc))
                .forEach(tr => tbody.appendChild(tr));
            asc = !asc;  // Toggle the sorting order for next click
        });
    });



    
    // Show rows functionality
    rowsSelect.addEventListener('change', function () {
        const selectedRows = parseInt(this.value);
        showRows(selectedRows);
    });

    // Search functionality
    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        filterRows(searchTerm);
    });

    // Function to show the selected number of rows
    function showRows(count) {
        allRows.forEach(row => row.style.display = 'none');

        for (let i = 0; i < count && i < allRows.length; i++) {
            allRows[i].style.display = '';
        }
    }

    // Function to filter rows based on the search term
    function filterRows(searchTerm) {
        const filteredRows = allRows.filter(row => {
            const cells = Array.from(row.children);
            return cells.some(cell => cell.innerText.toLowerCase().includes(searchTerm));
        });

        // Hide all rows and show only filtered rows
        allRows.forEach(row => row.style.display = 'none');
        filteredRows.forEach(row => row.style.display = '');
    }

    // Initialize table by showing 10 rows by default
    showRows(10);
});
document.addEventListener('DOMContentLoaded', function () {
    const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

    const comparer = (idx, asc) => (a, b) => ((v1, v2) =>
        v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
    )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

    const table = document.querySelector('#employee-table');
    const headers = table.querySelectorAll('th');
    const rowsSelect = document.querySelector('#rows-select');
    const searchInput = document.querySelector('#search-input');
    const tbody = table.querySelector('tbody');
    const allRows = Array.from(tbody.querySelectorAll('tr'));

    // Sorting functionality
    headers.forEach((th, index) => {
        th.addEventListener('click', function () {
            Array.from(tbody.querySelectorAll('tr'))
                .sort(comparer(index, (this.asc = !this.asc)))
                .forEach(tr => tbody.appendChild(tr));
        });
    });

    // Show rows functionality
    rowsSelect.addEventListener('change', function () {
        const selectedRows = parseInt(this.value);
        showRows(selectedRows);
    });

    // Search functionality
    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        filterRows(searchTerm);
    });

    // Function to show the selected number of rows
    function showRows(count) {
        allRows.forEach(row => row.style.display = 'none');

        for (let i = 0; i < count && i < allRows.length; i++) {
            allRows[i].style.display = '';
        }
    }

    // Function to filter rows based on the search term
    function filterRows(searchTerm) {
        const filteredRows = allRows.filter(row => {
            const cells = Array.from(row.children);
            return cells.some(cell => cell.innerText.toLowerCase().includes(searchTerm));
        });

        // Hide all rows and show only filtered rows
        allRows.forEach(row => row.style.display = 'none');
        filteredRows.forEach(row => row.style.display = '');
    }

    // Initialize table by showing 10 rows by default
    showRows(10);

    // Open popup functionality for all buttons
    const openPopupButtons = document.querySelectorAll('.open-popup');
    const overlay = document.getElementById('overlay');
    const popup = document.getElementById('popup');
    const closePopup = document.getElementById('close-popup');
    
    openPopupButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Get data from the button
            const date = button.getAttribute('data-date');
            const time = button.getAttribute('data-time');
            const caseDetails = button.getAttribute('data-case');
            const identity = button.getAttribute('data-identity');
            const guardian_name = button.getAttribute('data-guardian_name') || 'N/A'; 
            const relation = button.getAttribute('data-relation')|| 'N/A';
            const victimName = button.getAttribute('data-victim_name');
            const gender = button.getAttribute('data-gender');
            const age = button.getAttribute('data-age');
            const contact = button.getAttribute('data-contact');
            const email = button.getAttribute('data-email');
            const status = button.getAttribute('data-status');
            const ref = button.getAttribute('data-ref');
            const report = button.getAttribute('data-report');
            const inCharge = button.getAttribute('data-in_charge')|| 'N/A'; 
            const summary = button.getAttribute('data-assess')|| 'N/A'; 
           
            document.getElementById('popup-date').textContent = date;
            document.getElementById('popup-time').textContent = time;
            document.getElementById('popup-case').textContent = caseDetails;
            document.getElementById('popup-identity').textContent = identity;
            document.getElementById('popup-guardian_name').textContent = guardian_name;
            document.getElementById('popup-relation').textContent = relation;
            document.getElementById('popup-victim_name').textContent = victimName;
            document.getElementById('popup-age').textContent = age;
            document.getElementById('popup-gender').textContent = gender;
            document.getElementById('popup-contact').textContent = contact;
            document.getElementById('popup-email').textContent = email;
            document.getElementById('popup-status').textContent = status;
            document.getElementById('popup-in-charge').textContent = inCharge;
            document.getElementById('popup-ref').textContent = ref;
            document.getElementById('popup-report').textContent = report;
            document.getElementById('popup-summary').textContent = summary;
            // Show the popup
            overlay.style.display = 'block';
            popup.style.display = 'block';
        });
    });
    
    closePopup.addEventListener('click', () => {
        overlay.style.display = 'none';
        popup.style.display = 'none';
    });
    
    // Close popup when clicking outside of it
    overlay.addEventListener('click', () => {
        overlay.style.display = 'none';
        popup.style.display = 'none';
    });
    
});

