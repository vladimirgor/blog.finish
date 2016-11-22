/**
 * Created by Владимир on 12.09.2016.
 */
function password_match() {

    if ( $('#message').html() != '' ) $('#message').html('');

    if ( $('#psw').val() === $('#psw_rep').val() )
    {
        return true;
    }
    else {
        $('#message').html('Entered passwords do not match.');
        return false;
    }
}
