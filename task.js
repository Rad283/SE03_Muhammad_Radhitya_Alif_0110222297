const showDownload = (result) => {
  console.log(`Download Selesai`);
  console.log(`Hasil Download ${result}`);
};

const download = () => {

  return new Promise(resolve => {
    setTimeout(() => {
      const result = `windows-10.exe`;
      resolve(result)
    }, `3000`)
  })
}


const main = async () => {
  try {
    showDownload(await download());
  } catch (error) {
    console.log(error);
  }
}

main()