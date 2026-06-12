<?php include 'includes/header.php'; ?>

<div class="container">

    <h2>Kontakt</h2>

    <br>

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18..."
        width="100%"
        height="400"
        style="border:0;"
        allowfullscreen=""
        loading="lazy">
    </iframe>

    <br><br>

    <form>

        <label>First Name</label>
        <input type="text" name="firstname" required>

        <label>Last Name</label>
        <input type="text" name="lastname" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Country</label>
        <select name="country">

            <option>Croatia</option>
            <option>Germany</option>
            <option>Austria</option>
            <option>Italy</option>

        </select>

        <br><br>

        <label>
            <input type="checkbox" name="newsletter">
            Newsletter
        </label>

        <br><br>

        <label>Subject</label>

        <textarea
            name="subject"
            rows="5"
            required></textarea>

        <br><br>

        <button type="submit">
            Send
        </button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>