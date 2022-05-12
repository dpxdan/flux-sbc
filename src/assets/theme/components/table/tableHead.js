/**
=========================================================
* FluxSBC React - v2.1.0
=========================================================

* Copyright 2022 Flux Telecom (https://flux.net.br)

Coded by Daniel Paixao

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/

// Material Dashboard 2 React base styles
import borders from "assets/theme/base/borders";

// Material Dashboard 2 React helper functions
import pxToRem from "assets/theme/functions/pxToRem";

const { borderRadius } = borders;

const tableHead = {
  styleOverrides: {
    root: {
      display: "block",
      padding: `${pxToRem(16)} ${pxToRem(16)} 0  ${pxToRem(16)}`,
      borderRadius: `${borderRadius.xl} ${borderRadius.xl} 0 0`,
    },
  },
};

export default tableHead;
