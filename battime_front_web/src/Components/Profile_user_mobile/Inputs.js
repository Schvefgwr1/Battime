import Input from "./Input";


export default function Inputs(
        phoneNumber, handleInputPhoneNumber,
        firstName, handleChangeFirstName,
        lastName, handleChangeLastName,
        email, handleChangeEmailName
) {
    let inputs = [];
    inputs.push(Input("Phone number", phoneNumber, handleInputPhoneNumber));
    inputs.push(Input("Firstname", firstName, handleChangeFirstName));
    inputs.push(Input("Lastname", lastName, handleChangeLastName));
    inputs.push(Input("Email", email, handleChangeEmailName));
    return inputs;
}