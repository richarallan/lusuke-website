import * as S from './styles'
type NormalTextProps = {
  children: React.ReactNode
}

const NormalText = ({ children }: NormalTextProps) => (
  <S.NormalText>{children}</S.NormalText>
)

export default NormalText
