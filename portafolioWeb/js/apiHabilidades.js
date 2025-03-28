   const dataLenguaje = [
            { label: 'Javascript', value: 40},
            { label: 'PHP', value: 50},
            { label: 'Java', value: 30 },
            { label: 'Ruby', value:30},
            { label: 'Typescript', value: 10 },
        ];

        function renderChart(dataLenguaje) {
            const chart = document.getElementById('chartLenguajes');
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

        renderChart(dataLenguaje);
