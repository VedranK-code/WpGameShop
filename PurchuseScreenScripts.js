    const currentDateElement = document.getElementById('currentDate');
    const currentDate = new Date();
    
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = currentDate.toLocaleDateString('en-US', options);

    currentDateElement.textContent = formattedDate;