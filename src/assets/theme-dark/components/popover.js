/**
=========================================================
* FluxSBC React - v2.1.0
=========================================================

* Copyright 2022 Flux Telecom (https://flux.net.br)

Coded by Daniel Paixao

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/

// Material Dashboard 2 React helper functions
import pxToRem from "assets/theme-dark/functions/pxToRem";

// Material Dashboard 2 React base styles
import colors from "assets/theme-dark/base/colors";
import boxShadows from "assets/theme-dark/base/boxShadows";
import borders from "assets/theme-dark/base/borders";

const { transparent } = colors;
const { md } = boxShadows;
const { borderRadius } = borders;

const popover = {
  styleOverrides: {
    paper: {
      backgroundColor: transparent.main,
      boxShadow: md,
      padding: pxToRem(8),
      borderRadius: borderRadius.md,
    },
  },
};

export default popover;
