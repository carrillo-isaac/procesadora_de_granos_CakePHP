<footer>
    <div class="footer-container">
        <div class="footer-info">
            <h4>Arroz Miró</h4>
            <p>
                Comprometidos con la calidad, la tradición agrícola y la sostenibilidad,
                llevando arroz y granos de confianza a las mesas panameñas.
            </p>
        </div>

        <div class="footer-social">
            <h4>Encuéntranos</h4>
            <ul>
                <li>
                    <a href="#" aria-label="Facebook Arroz Miró">
                        <?= $this->Html->image('icons/facebook.svg', [
                            'alt' => 'Facebook Arroz Miró'
                        ]) ?>
                    </a>
                </li>
                <li>
                    <a href="#" aria-label="Instagram Arroz Miró">
                        <?= $this->Html->image('icons/instagram.svg', [
                            'alt' => 'Instagram Arroz Miró'
                        ]) ?>
                    </a>
                </li>
                <li>
                    <a href="#" aria-label="YouTube Arroz Miró">
                        <?= $this->Html->image('icons/youtube.svg', [
                            'alt' => 'YouTube Arroz Miró'
                        ]) ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        &copy; <?= date('Y') ?> Arroz Miró. Todos los derechos reservados.
    </div>
</footer>