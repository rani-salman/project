
function toggleTextActive(event)
{
    var text = event.textContent || event.innerText;
    if (text == 'Active') {
        event.innerHTML = 'FREE';
        event.style.color = "green";
    } else {
        event.innerHTML = 'Active';
        event.style.color = "red";
    }
}
function toggleTextYes(event)
{
    var text = event.textContent || event.innerText;
    if (text == 'YES') {
        event.innerHTML = 'NO';
        event.style.color = "green";
    } else {
        event.innerHTML = 'YES';
        event.style.color = "red";
    }
}
function toggleTextServed(event)
{
    var text = event.textContent || event.innerText;
    if (text == 'Served') {
        event.innerHTML = 'Not Served';
        event.style.color = "red";
    } else {
        event.innerHTML = 'Served';
        event.style.color = "green";
    }
}
