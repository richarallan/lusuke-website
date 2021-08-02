import BreakPoints from 'components/BreakPoints'
import styled from 'styled-components'

export const NormalText = styled.p`
  @media screen and (${BreakPoints.device.sm}) {
    color: var(--highlight);
    font-size: 2rem;
  }
  margin: 0.5rem 0 2.5rem 0;
  font-size: 1rem;
  line-height: 1.5;
`
