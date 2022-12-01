        <!-- Footer-->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Araullo University Civil Engineering Online Review 2022. All Rights Reserved.</div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="our-team.php">Meet our Team</a>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="js/scripts.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
        <script>
            const constraints = {
                name: {
                    presence: { allowEmpty: false }
                },
                email: {
                    presence: { allowEmpty: false },
                    email: true
                },
                subject: {
                    presence: { allowEmpty: false }
                }
                message: {
                    presence: { allowEmpty: false }
                }
            };

            const form = document.getElementById('contact-form');
            form.addEventListener('submit', function (event) {

                const formValues = {
                    name: form.elements.name.value,
                    email: form.elements.email.value,
                    subject: form.elements.subject.value,
                    message: form.elements.message.value
                };

                const errors = validate(formValues, constraints);
                if (errors) {
                    event.preventDefault();
                    const errorMessage = Object
                        .values(errors)
                        .map(function (fieldValues) {
                            return fieldValues.join(', ')
                        })
                        .join("\n");
                    alert(errorMessage);
                }
            }, false);
        </script>
    </body>
</html>
