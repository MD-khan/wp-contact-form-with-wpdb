<div class="main-content container reservation">
        <main class="content-text clear">
            <div class="reservation-info">
                <form  class="reservation-form" method="post">
                    <h2> Make a Reservation </h2>
                    <div class="field">
                        <input type="text" name="name" placeholder="Name" require>
                    </div>
                    <div class="field">
                        <input type="datetime-local" name="date" placeholder="Date" require>
                    </div>
                    <div class="field">
                        <input type="tel" name="phone" placeholder="Phone" require>
                    </div>
                    <div class="field">
                        <input type="email" name="email" placeholder="Email" require>
                    </div>
                    <div class="field">
                        <textarea name="message" cols="30" rows="10"></textarea>
                    </div>

                    <input type="submit" name="submit_reservation" class="button">
                    <input type="hidden" name="hidden" value="1">
                </form>
            </div>
        </main>
    </div>
