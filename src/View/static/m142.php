<?php
    $page_title = "M142 HIMARS – AEROSYSTEMS"; // Задаем титул страницы
?>

<main class="main-content">
    <div class="product-details">
        <h1>M142 HIMARS – Ракетная система</h1>
        <p class="product-info">
            M142 HIMARS – это современная ракетная система, способная быстро развертываться и обеспечивать высокую
            точность при нанесении ударов по целям.
        </p>
        <!-- Product specifications table -->
        <table>
            <thead>
                <tr>
                    <th>Характеристика</th>
                    <th>Значение</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Длина</td>
                    <td>9 м</td>
                </tr>
                <tr>
                    <td>Вес</td>
                    <td>17 тонн</td>
                </tr>
                <tr>
                    <td>Время развертывания</td>
                    <td>&lt;5 минут</td>
                </tr>
                <tr>
                    <td>Экипаж</td>
                    <td>5</td>
                </tr>
            </tbody>
        </table>
        <button class="btn-download" onclick="generatePDF()">Скачать PDF‑брошюру</button>
    </div>
</main>

<?php include 'footer.php'; ?>

<!-- jsPDF and autoTable plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
<script>
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.setFontSize(18);
        doc.text("M142 HIMARS – Ракетная система", 20, 20);
        doc.setFontSize(12);
        doc.text("Быстроразвертываемая ракетная система с высокой точностью поражения.", 20, 30);

        doc.autoTable({
            head: [['Характеристика', 'Значение']],
            body: [
                ['Длина', '9 м'],
                ['Вес', '17 тонн'],
                ['Время развертывания', '<5 минут'],
                ['Экипаж', '5']
            ],
            startY: 40,
        });

        doc.save('M142_HIMARS_Brochure.pdf');
    }
</script>
</body>

</html>