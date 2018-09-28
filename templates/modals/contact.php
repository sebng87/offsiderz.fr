<div class="modal fade modal-contact" id="modal-contact" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="h2 modal-title">Contactez-moi</h4>

                <button type="button" class="btn-close cancel-btn" data-dismiss="modal" aria-label="Close">
                    <span class="icon icon-close"></span>
                </button>
            </div>

            <div class="modal-body">
                <form id="contact-form" class="form contact" action="/" method="post" novalidate autocomplete="off">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nom:</label>
                            <input type="text" class="form-control" id="contact-name" name="name" placeholder="Entrez votre nom" required>
                            <small></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="contact-email" name="email" placeholder="Entrez votre adresse email" required>
                        <small></small>
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="contact-message" name="message" rows="5" placeholder="Tapez votre message" required></textarea>
                        <small></small>
                    </div>

                    <div class="ui alert alert-danger has-icon">
                        <span class="icon icon-round icon-close"></span>
                        <p>Votre message n'a pas pu être envoyé.</p>
                    </div>

                    <div class="ui alert alert-success has-icon">
                        <span class="icon icon-round icon-check"></span>
                        <p>Votre message a correctement été envoyé.</p>
                    </div>

                    <button type="submit" class="btn btn-secondary btn-loader">
                        <span>Envoyer</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
