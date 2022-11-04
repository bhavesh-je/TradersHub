import firebase from "firebase";
import { getFirestore, collection, getDocs } from 'firebase/firestore/lite';

const firebaseConfig = {
    apiKey: "AIzaSyCdfM2F_PHFYMSVN9JsM7oOMmp8LvjqT8o",
    authDomain: "traders-hub-65416.firebaseapp.com",
    projectId: "traders-hub-65416",
    storageBucket: "traders-hub-65416.appspot.com",
    messagingSenderId: "732998909090",
    appId: "1:732998909090:web:aeddbe2c35368a21adebfb",
    measurementId: "G-MWPS36JXW7"
};

firebase.initializeApp(firebaseConfig);
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);
// Get a list of cities from your database
async function getCities(db) {
    const citiesCol = collection(db, 'cities');
    const citySnapshot = await getDocs(citiesCol);
    const cityList = citySnapshot.docs.map(doc => doc.data());
    return cityList;
}

export default firebase;