import { createGlobalStyle } from 'styled-components'

const GlobalStyles = createGlobalStyle`
  :root {
    --background: #efefe6;
    --black: #1c1c1c;
    --white: #ffffff;
    --highlight: #75b9a5;

    --tiny: 1.5rem;
    --small: 2rem;
    --medium: 3rem;
    --large: 5rem;
  }
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  html {
    font-size: 62.5%;
  }

  html, body, #__next {
    height: 100%;
  }

  body {
    font-family: lato, sans-serif, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue';
    text-rendering: optimizeLegilibity;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    color: var(--black);
    background: var(--background)
  }
  a {
    color: var(--black);
    text-decoration: none;
    cursor: pointer;
    &:hover {
      color: var(--highlight)
    }
  }
  p {
    font-size: 1.5rem;
    line-height: var(--tiny);
  }
`

export default GlobalStyles
