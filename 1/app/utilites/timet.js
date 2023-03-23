export function timer(timing) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (Math.random() > 0.5) {
                resolve()
            } else {
                reject()
            }
        }, timing);
    })
}