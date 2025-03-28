const dataLenguajes = [
    { label: 'JavaScript', value: 40 },
    { label: 'PHP', value: 50 },
    { label: 'Java', value: 30 },
    { label: 'Ruby', value: 30 },
    { label: 'TypeScript', value: 10 },
];

const dataHerramientas = [
    { label: 'Git', value: 40 },
    { label: 'Docker', value: 20 },
    { label: 'Bootstrap', value: 40 },
    { label: 'Postman', value: 20 },
    { label: 'DBeaver', value: 50 },
];

const dataFrameworks = [
    { label: 'Angular', value: 30 },
    { label: 'React', value: 20 },
    { label: 'Apache NetBeans', value: 40 },
    { label: 'Android Studio', value: 40 },
    { label: 'Ruby on Rails', value: 30 },
];

function renderChart(data, id) {
    const chart = document.getElementById(id);
    if (!chart) return; // Evita errores si el elemento no existe
    chart.innerHTML = '';

    data.forEach(item => {
        const bar = document.createElement('div');
        bar.className = 'bar';

        const label = document.createElement('span');
        label.className = 'label';
        label.textContent = item.label;

        const barFill = document.createElement('div');
        barFill.className = 'bar-fill';
        barFill.style.width = `${item.value}%`;
        barFill.textContent = `${item.value}%`;

        bar.appendChild(label);
        bar.appendChild(barFill);
        chart.appendChild(bar);
    });
}

renderChart(dataLenguajes, 'chartLenguajes');
renderChart(dataHerramientas, 'chartHerramientas');
renderChart(dataFrameworks, 'chartFrameworks');
