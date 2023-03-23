import css from "./style/index.css";
import { timer } from "./utilites/timet";
import { randomFromInterval } from "./utilites/randomFromInterval";

const IMAGE_BY_STATUS = {
    ERROR: "/assets/images/cancel.png",
    SUCCESS: "/assets/images/checked.png",
};

async function main() {
    const allElements = document.querySelectorAll(".signature-item");

    for (const element of allElements) {
        const image = element.querySelector("img");
        image.classList.add("rotating");
        try {
            await timer(randomFromInterval(1000, 5000));
            image.src = IMAGE_BY_STATUS.SUCCESS;
        } catch {
            image.src = IMAGE_BY_STATUS.ERROR;
        }
        image.classList.remove("rotating");
    }
}

const button = document.querySelector(".signature__btn");

button.addEventListener("click", () => {
    main();
});