//Options
const externalOptions = [
    { value: '1', name: 'Latest' },
    { value: '2', name: 'Earliest' },
    { value: '3', name: 'High to low' },
    { value: '4', name: 'Low to high' },
];

function populateDL(){
    const dataList = document.getElementById('inputfield');
    dataList.innerHTML = '';

    externalOptions.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option.value;
        optionElement.innerHTML = option.name;
        dataList.appendChild(optionElement);
    })
}
document.addEventListener('DOMContentLoaded', () => {
    populateDL();
});

const inputField = document.getElementById('inputField');
inputField.addEventListener('focus', populateDL);


function Changes(){
    window.alert("s");
}