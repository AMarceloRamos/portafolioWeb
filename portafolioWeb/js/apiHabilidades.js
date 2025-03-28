const dataLenguajes = [
    { label: 'JavaScript', value: 40 },
    { label: 'PHP', value: 40},
    { label: 'Java', value: 30 },
    { label: 'Ruby', value: 30 },
    { label: 'TypeScript', value: 20 },
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
                barFill.style.width = '0%';
                barFill.textContent = `${item.value}%`;

                // Animación de entrada
                setTimeout(() => {
                    barFill.style.width = `${item.value}%`;
                }, 100);

                // Evento para mostrar el tooltip
                barFill.addEventListener('mouseover', (e) => {
                    tooltip.style.opacity = 1;
                    tooltip.textContent = `${item.label}: ${item.value}%`;
                    tooltip.style.top = `${e.clientY - 30}px`;
                    tooltip.style.left = `${e.clientX + 10}px`;
                });

                barFill.addEventListener('mouseout', () => {
                    tooltip.style.opacity = 0;
                });

                bar.appendChild(label);
                bar.appendChild(barFill);
                chart.appendChild(bar);
            });
}

renderChart(dataLenguajes, 'chartLenguajes');
renderChart(dataHerramientas, 'chartHerramientas');
renderChart(dataFrameworks, 'chartFrameworks');
